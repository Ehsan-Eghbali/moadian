<?php

namespace App\Repositories;

interface InvoiceRepositoryInterface
{
   // Extend with your methods
    public function getInvoiceBuilder();

    public function explode_invoice($invoices);

    public function update_data();

}
