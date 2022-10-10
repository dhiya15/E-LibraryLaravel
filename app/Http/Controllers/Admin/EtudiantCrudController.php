<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EtudiantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EtudiantCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EtudiantCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Etudiant::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/etudiant');
        CRUD::setEntityNameStrings('etudiant', 'etudiants');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('nom');
        CRUD::column('prénom');
        CRUD::column('telephone');
        CRUD::column('email');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(EtudiantRequest::class);

        CRUD::addField([
            'name' => 'code',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name' => 'nom',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name' => 'prénom',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name' => 'email',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name' => 'telephone',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'  => 'mot_de_passe',
            'type'  => 'hidden',
            'value' => 'active',
        ]);
        CRUD::addField([
            'name' => 'date_de_naissance',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ]
        ]);
        CRUD::addField([
            'name' => 'lieu_de_naissance',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name' => 'adress',
            'wrapper' => [
                'class' => 'form-group col-md-5'
            ]
        ]);
        CRUD::addField([
            'name'  => 'niveau',
            'label' => 'Niveau',
            'type'  => 'enum',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name'  => 'matière',
            'label' => 'Matière',
            'type'  => 'enum',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name'  => 'phase',
            'label' => 'Phase',
            'type'  => 'enum',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name'  => 'type',
            'type'  => 'hidden',
            'value' => 'active',
        ]);
        CRUD::addField([
            'label' => "Image",
            'name' => 'image',
            'type' => 'upload',
            'upload' => true,
            'aspect_ratio' => 1,
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ]
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
