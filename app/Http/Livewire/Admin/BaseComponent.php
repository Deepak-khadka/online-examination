<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BaseComponent extends Component
{

    public $message = [
        'success' => '',
        'error' => ''
    ];

    /**
     * @param $message
     * @return void
     */
    public function setSuccessMessage($message): void
    {
        $this->message['success'] = $message;
    }

    /**
     * @param $message
     * @return void
     */
    public function setErrorMessage($message): void
    {
        $this->message['error'] = $message;
    }

    /**
     * @param $model
     * @param $filter
     * @return void
     */
    public function saveModel($model, $filter): void
    {
        $this->validate();

        $model::create($filter);

        $this->reset();

        $this->setSuccessMessage('Successfully created a record');

    }

    /**
     * @param $model
     * @param $updatedData
     * @return void
     */
    public function updateModel($model, $updatedData): void
    {
        $this->validate();

        $updateDetail = $model::find($updatedData['id']);

        $updateDetail->update($updatedData);

        $this->reset();

        $this->setSuccessMessage('Successfully update a record');

    }

    /**
     * @param $model
     * @param $id
     * @return void
     */
    public function deleteModel($model, $id): void
    {
        $checkModel = $model::find($id);

        $checkModel->delete();

        $this->setSuccessMessage('Successfully deleted a record');
    }

}
