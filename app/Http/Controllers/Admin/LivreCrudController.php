<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LivreRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LivreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LivreCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Livre::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/livre');
        CRUD::setEntityNameStrings('livre', 'livres');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::column('cotation');
        CRUD::addColumn(
            [
                'name'  => 'titres',
                'label' => 'Titre',
                'type'  => 'text',
                'limit'  => 20
            ]
        );
        CRUD::column('auteur');
        /*CRUD::column('inventaire');
        CRUD::column('nombre_ex');
        CRUD::column('spécialiste');
        CRUD::column('date_edition');
        CRUD::column('editeur');
        CRUD::column('date_entrée');
        CRUD::column('isbn');
        CRUD::column('image');*/

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
        CRUD::setValidation(LivreRequest::class);

        CRUD::addField([
            'name' => 'cotation',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],]
        );
        CRUD::addField([
                'name' => 'inventaire',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],]
        );
        CRUD::addField([
                'name' => 'nombre_ex',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],]
        );


        CRUD::addField([
                'name' => 'titres',
                'wrapper' => [
                    'class' => 'form-group col-md-7'
                ],
                ]
        );
        CRUD::addField([
                'name' => 'auteur',
                'wrapper' => [
                    'class' => 'form-group col-md-5'
                ],]
        );


        CRUD::addField([
                'name' => 'spécialiste',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],]
        );
        CRUD::addField([
                'name' => 'matière',
                'type'  => 'enum',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],]
        );
        CRUD::addField([
                'name' => 'editeur',
                'wrapper' => [
                    'class' => 'form-group col-md-8'
                ],]
        );
        CRUD::addField([
                'name' => 'date_edition',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],]
        );

        CRUD::addField([
                'name' => 'date_entrée',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],]
        );
        CRUD::addField([
                'name' => 'isbn',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],]
        );
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

    protected function setupShowOperation()
    {
        CRUD::column('cotation');
        CRUD::column('titres');
        CRUD::column('auteur');
        CRUD::column('inventaire');
        CRUD::column('nombre_ex');
        CRUD::column('spécialiste');
        CRUD::column('date_edition');
        CRUD::column('editeur');
        CRUD::column('date_entrée');
        CRUD::column('isbn');
        //CRUD::column('image');
        $this->crud->addColumn([
            'name'      => 'image', // The db column name
            'label'     => 'Image livre', // Table column heading
            'type'      => 'image',
            //'prefix' => 'folder/subfolder/',
            'height' => '150px',
            'width'  => '100px',
        ]);


    }

}
