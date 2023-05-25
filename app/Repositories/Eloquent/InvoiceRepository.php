<?php

namespace App\Repositories\Eloquent;

use App\Models\Invoice;
use App\Repositories\InvoiceRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class InvoiceRepository.
 */
class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Invoice $model
     */
    public function __construct(Invoice $model)
    {
        parent::__construct($model);
    }

    public function getInvoiceBuilder()
    {
        return $this->model->with('product','user','state');
    }
    public function explode_invoice($invoices)
    {
        return explode(',', $invoices);
    }
    public function update_data()
    {
        // TODO: Implement update_data() method.
    }
}
