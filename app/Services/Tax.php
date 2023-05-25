<?php

namespace App\Services;

class Tax
{
    public $baseUrl = 'https://tp.tax.gov.ir/req/';
    protected $normal_send = '/api/self-tsp/async/normal-enqueue/';
    protected $fast_send = '/api/self-tsp/async/fast-enqueue/';
    protected $get_token = '/api/self-tsp/sync/GET_TOKEN/';
    protected $get_information = '/api/self-tsp/sync/INQUIRY_BY_UID/';


    public function header()
    {

    }
}
