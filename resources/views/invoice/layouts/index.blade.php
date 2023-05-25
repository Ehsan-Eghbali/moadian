@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/admin/dataTable/dataTable.min.css">
    <link rel="stylesheet" href="/assets/admin/dataTable/buttons.dataTables.min.css">
@endsection
@section('content')
    <div class="card card-yellow">
        <div class="card-header">
            @yield('card-header')
        </div>
        <!-- /.card-header -->
        <div class="card-body align-items-center table-responsive p-1">
            <table id="example1"
                   class="text-sm table hover display table-striped table-bordered datatable no-footer">
                <thead>
                <tr>
                    <th class="text-center">شماره فاکتور</th>
                    <th class="text-center">نوع فاکتور</th>
                    <th class="text-center">تاریخ فاکتور</th>
                    <th class="text-center">نوع شخص</th>
                    <th class="text-center">کد ملی/کد اقتصادی</th>
                    <th class="text-center"> نام خریدار</th>
                    <th class="text-center">نام محصول</th>
                    <th class="text-center">تعداد</th>
                    <th class="text-center">فی</th>
                    <th class="text-center">تخفیف</th>
                    <th class="text-center">مالیات و عوارض</th>
                    <th class="text-center">مجموع</th>
                    <th class="text-center">ایجاد کننده</th>
                    <th class="text-center">وضعیت</th>

{{--                    <th class="text-center">عملیات</th>--}}
                </tr>
                <tr id="mainRow">
                    <th>شماره فاکتور</th>
                    <th>نوع فاکتور</th>
                    <th>تاریخ فاکتور</th>
                    <th>نوع شخص</th>
                    <th>کد ملی/کد اقتصادی</th>
                    <th> نام خریدار</th>
                    <th>نام محصول</th>
                    <th>تعداد</th>
                    <th>فی</th>
                    <th>تخفیف</th>
                    <th>مالیات و عوارض</th>
                    <th>مجموع</th>
                    <th>ایجاد کننده</th>
                    <th>وضعیت</th>

{{--                    <th>عملیات</th>--}}
                </tr>

                </thead>
                <tbody>
                <tr>
                </tr>
                </tbody>
{{--                <tfoot>--}}
{{--                <tr>--}}
{{--                    <th colspan="3" class="text-right"></th>--}}
{{--                    <th colspan="3" style="text-align-last:right" class="text-right"></th>--}}
{{--                    <th colspan="3" class="text-right"></th>--}}
{{--                    <th colspan="3" class="text-right"></th>--}}
{{--                    <th colspan="3" class="text-right"></th>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

@section('script')
    <script src="/assets/admin/dataTable/dataTable.min.js"></script>
    <script src="/assets/admin/dataTable/dataTables.buttons.min.js"></script>
    <script src="/assets/admin/dataTable/jszip.min.js"></script>
    <script src="/assets/admin/dataTable/buttons.html5.min.js"></script>
    <script src="/assets/admin/dataTable/buttons.print.min.js"></script>
    <script src="/assets/admin/dataTable/vfs_fonts.js"></script>
    <script>
        $(document).ready(function () {
            let invoices =[];
            // Setup - add a text input to each footer cell
            $('#mainRow th').each(function () {
                var title = $(this).text();
                var name = $(this).attr('data-name')
                $(this).html('<input name="' + name + '" type="text" placeholder="جستجو ' + title + '" />');
            })
            var table = $('#example1').DataTable({
                "responsive": true,
                "autoWidth" : true,
                select: true,
                buttons: [
                    'excel', 'pageLength', 'colvis',
                    {
                        text: 'انتخاب همه',
                        action: function () {
                            $('#example1 tbody tr').toggleClass('selected');
                            const items = table.rows('.selected').data()
                            if(items.length ===0 ){
                                checkboxes = $("[name='invoices']").val('');
                                invoices = []
                            }
                            else{
                                for (i = 0, n = items.length; i < n; i++) {
                                    select = $.map(items, function (o) {
                                        return o["id"];
                                    })
                                    checkboxes = $("[name='invoices']").val(select);
                                    invoices = select
                                }
                            }
                            activeElements()
                        }
                    },
                ],

                dom    : 'Bfrtip',
                "stateSave"     : true,
                "scrollY"       : '62vh',
                "scrollX"       : true,
                "scroller"      : true,
                "scrollCollapse": true,
                "paging"        : true,
                "ordering"      : true,
                "pageLength"    : 100,
                "lengthMenu"    : [[10, 50, 100, 500, -1], [10, 50, 100, 500, "همه"]],
                "page"          : 10,
                deferRender     : true,
                language: {
                    processing: "<img style='width: inherit' src='/assets/admin/images/loading/multi.gif'><b>در حال بارگیری ...</b>",
                },
                processing      : true,
                serverSide      : true,
                ajax            : {
                    url: "@yield('ajax-url')",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                },
                columns         : [
                    {data: 'taxid', name: 'taxid'},
                    {data: 'ins', name: 'ins', orderable :true,
                    render:function (data) {
                        switch (data) {
                            case 1:
                                return 'اصلی'
                            case 2:
                                return 'اصلاحی'
                            case 3:
                                return 'ابطالی'
                            case 4:
                                return 'برگشت از فروش'
                        }
                    }
                    },
                    {
                        data  : 'invoice_date',
                        name  : 'invoice_date',
                        render: function (data) {
                            if (!data) {
                                return ""
                            }
                            const do_date = data.split('-')
                            const date = new Date([do_date[0], do_date[1], do_date[2]]);
                            const options = { year: 'numeric', month: '2-digit', day: '2-digit', calendar: 'persian' };
                            return date.toLocaleDateString('fa', options).replace(/\u200E/g, '');
                        },
                    },
                    {data: 'tob', name: 'tob', orderable :true,
                        render:function (data) {
                            switch (data) {
                                case 1:
                                    return 'حقیقی'
                                case 2:
                                    return 'حقوقی'
                                case 3:
                                    return 'مشارکت مدنی'
                                case 4:
                                    return 'اتباع خارجی'
                            }
                        }
                    },
                    {data: 'tinb', name: 'tinb', orderable :false},
                    {data: 'bn', name: 'bn'},
                    {data: 'product', name: 'product', orderable :true,
                        render:function (data) {
                            return data.name
                        }

                    },
                    {
                        data: 'am',
                        name: 'am',
                        render:function (data) {
                            return data.toLocaleString()
                        }
                    },
                    {
                        data: 'fee',
                        name: 'fee',
                        render:function (data) {
                            return data.toLocaleString()
                        }
                    },
                    {
                        data: 'dis',
                        name: 'dis',
                        render:function (data) {
                            return data.toLocaleString()
                        }
                    },
                    {
                        data: 'vam',
                        name: 'vam',
                        render:function (data) {
                            return data.toLocaleString()
                        }
                    },
                    {
                        data: 'cap',
                        name: 'cap',
                        render:function (data) {
                            return data.toLocaleString()
                        }
                    },
                    {
                        data: 'user',
                        name: 'user',
                        render:function (data) {
                            return data.name + " " + data.family
                        }
                    },
                    {
                        data: 'state',
                        name: 'state',
                        render:function (data) {
                            return data.name
                        }
                    },
                ],
                // "createdRow": function( row, data, dataIndex ) {
                //     if (data.states.id > 2 && data.request_payment == null){
                //         $(row).addClass('bg-yellow')
                //     }
                //     else if (data.states.id === 2){
                //         $(row).addClass('bg-info')
                //     }
                //     else if (data.states.id === 1 && data.attachment.length === 0){
                //         $(row).addClass('bg-yellow')
                //     }
                // },

                initComplete: function () {
                    api = this.api()
                    api.columns()
                        .every(function () {
                            var that = this;
                            $('input', this.header()).on('keyup change', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
                // footerCallback: function (row, data, start, end, display) {
                //     var api = this.api();
                //
                //     // Remove the formatting to get integer data for summation
                //     var intVal = function (i) {
                //         return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                //     };
                //
                //     pageTotal = api
                //         .column(2, { page: 'current' })
                //         .data()
                //         .reduce(function (a, b) {
                //             return intVal(a) + intVal(b);
                //         }, 0);
                //     // Update footer
                //     $(api.column(2).footer()).html('مجموع:' + pageTotal.toLocaleString());
                // },

            });
            // var state = table.state.loaded();
            // if (state) {
            //     table.columns().eq(0).each(function (colIdx) {
            //         var colSearch = state.columns[colIdx].search;
            //
            //         if (colSearch.search) {
            //             $('input', table.column(colIdx).header()).val(colSearch.search);
            //         }
            //     });
            //     table.draw();
            // }
            $('#example1 tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
                items = table.rows('.selected').data()
                if(items.length === 0 ){
                    checkboxes = $("[name='invoices']").val('');
                    invoices = []
                }
                else{
                    for (i = 0, n = items.length; i < n; i++) {
                        select = $.map(items, function (o) {
                            return o["id"];
                        })
                        checkboxes = $("[name='invoices']").val(select);
                        invoices = select
                    }
                }
            activeElements()
            });
        });

    </script>

    <script>
        function toggle(source) {
            checkboxes = document.getElementsByName('requests');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
                if ($.isNumeric($(checkboxes[i]).attr('id'))) {
                    checkbox($(checkboxes[i]).attr('id'))
                }
            }
        }
    </script>
    <script>
        function activeElements() {
            const approveRequest = $('#approveRequest')
            if ($("[name='invoices']").val().length>0) {
                approveRequest.removeClass('d-none')

            } else {
                approveRequest.addClass('d-none')
            }
        }
    </script>
@endsection
