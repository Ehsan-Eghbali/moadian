<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inno')->unique();
            $table->string('invoice_date');
            $table->integer('controller_number');
            $table->longText('taxid')->unique();
            $table->unsignedInteger('indatim')->nullable();
            $table->unsignedInteger('Indati2m')->nullable();

            $table->foreignId('irtaxid')->nullable()->constrained('invoices');
            $table->tinyInteger('ins');
            $table->bigInteger('tins')->nullable();
            $table->string('bn')->nullable();
            $table->bigInteger('tinb')->nullable();
            $table->tinyInteger('tob')->nullable();
            $table->integer('bid')->nullable();

            $table->integer('sbc')->nullable();
            $table->integer('bpc')->nullable();
            $table->integer('bbc')->nullable();
            $table->tinyInteger('ft')->nullable();
            $table->text('bpn')->nullable();
            $table->integer('scln')->nullable();
            $table->integer('scc')->nullable();
            $table->text('cdcn')->nullable();
            $table->integer('cdcd')->nullable();
            $table->integer('crn')->nullable();
            $table->bigInteger('billid')->nullable();
            $table->double('tprdis',18,0)->nullable();
            $table->double('tdis',18,0)->nullable();
            $table->double('tadis',18,0)->nullable();
            $table->double('tvam',18,0)->nullable();
            $table->double('todam',18,0)->nullable();
            $table->double('tbill',18,0)->nullable();
            $table->double('tonw',16,8)->nullable();
            $table->double('torv',18,0)->nullable();
            $table->double('tocv',15,4)->nullable();
            $table->tinyInteger('setm')->nullable();
            $table->double('cap',18,0)->nullable();
            $table->double('insp',18,0)->nullable();
            $table->double('tvop',18,0)->nullable();
            $table->double('tax17',18,0)->nullable();
            $table->double('am',13,8)->nullable();
            $table->integer('mu')->nullable();
            $table->double('nw',16,8)->nullable();
            $table->double('fee',18,8)->nullable();
            $table->double('cfee',15,4)->nullable();
            $table->integer('cut')->nullable();
            $table->double('exr',18,0)->nullable();
            $table->double('ssrv',18,0)->nullable();
            $table->double('sscv',15,4)->nullable();
            $table->double('prdis',18,0)->nullable();
            $table->double('dis',18,0)->nullable();
            $table->double('adis',18,0)->nullable();
            $table->double('vra',3,2)->nullable();
            $table->double('vam',18,0)->nullable();
            $table->longText('odt')->nullable();
            $table->double('odr',3,2)->nullable();
            $table->double('odam',18,0)->nullable();
            $table->longText('olt')->nullable();
            $table->double('olr',3,2)->nullable();
            $table->double('olam',18,0)->nullable();
            $table->double('consfee',18,0)->nullable();
            $table->double('spro',18,0)->nullable();
            $table->double('bros',18,0)->nullable();
            $table->double('tcpbs',18,0)->nullable();
            $table->double('cop',18,0)->nullable();
            $table->double('vop',18,0)->nullable();
            $table->unsignedBigInteger('bsrn')->nullable();
            $table->double('tsstam',18,0)->nullable();
            $table->unsignedBigInteger('iinn')->nullable();
            $table->unsignedBigInteger('acn')->nullable();
            $table->unsignedBigInteger('trmn')->nullable();
            $table->tinyInteger('pmt')->nullable();
            $table->unsignedBigInteger('trn')->nullable();
            $table->unsignedBigInteger('pcn')->nullable();
            $table->unsignedBigInteger('pid')->nullable();
            $table->unsignedInteger('pdt')->nullable();
            $table->double('pv',18,0)->nullable();

            $table->unsignedBigInteger('order_item')->nullable();
            $table->string('VoucherTypeName')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('state_id')->constrained('states')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('invoices', function (Blueprint $table) {
//            $table->dropConstrainedForeignId('user_id');
//        });
        Schema::dropIfExists('invoices');
    }
};
