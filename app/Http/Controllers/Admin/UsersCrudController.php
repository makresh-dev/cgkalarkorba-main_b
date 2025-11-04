<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Users::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('users', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
    
        $this->crud->addColumn([
          'name' => 'name', // The db column name
          'label' => "Name", // Table column heading
          'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'mobile_no',
            'label' => 'Mobile No.',
            'type' => 'text',
        ]);
        
        $this->crud->addColumn([
            'name' => 'register_no',
            'label' => 'Registration No.',
            'type' => 'text',
        ]);
        
        $this->crud->addColumn([
            'name' => 'gender',
            'label' => 'Gender',
            'type' => 'text',
        ]);
        
        $this->crud->addColumn([
            'name' => 'dob',
            'label' => 'Date of birth',
            'type' => 'text'
        ]);
        
        

        $this->crud->addButtonFromView('line', 'moderate', 'moderate', 'end');



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
        CRUD::setValidation(UsersRequest::class);

        // CRUD::setFromDb(); // fields


        $this->crud->addField([
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'label' => "Profile Image",
            'name' => "image",
            'type' => 'image',
            // 'crop' => true, // set to true to allow cropping, false to disable
            // 'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            // 'disk'      => 'public/uploads/', // in case you need to show images from a different disk
            // 'prefix'    => '' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);

        $this->crud->addField([
            'label' => 'Gender',
            'name' => 'gender',
            'type' => 'select_from_array',
            'options' => ['male' => 'Male', 'female' => 'Female'],
        ]);

        $this->crud->addField([
            'label' => 'Height',
            'name' => 'height',
            'type' => 'number',
        ]);

        $this->crud->addField([
            'label' => 'Zodiac',
            'name' =>'zodiac',
            'type' =>'text',
        ]);

        $this->crud->addField([
            'label' => 'Manglik',
            'name' => 'manglik',
            'type' => 'select_from_array',
            'options' => ['yes' => 'हां', 'no' => 'नहीं'],
        ]);

        $this->crud->addField([
            'label' => 'Tribe',
            'name' => 'tribe',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name'  => 'dob',
            'label' => 'Date of birth',
            'type'  => 'date_picker',

            'date_picker_options' => [
              'todayBtn' => 'linked',
              'format'   => 'dd-mm-yyyy',
              'language' => 'en'
            ],
        ]);

        $this->crud->addField([
            'label' => 'Birth Place',
            'name' => 'birth_place',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name'  => 'time',
            'label' => 'Time',
            'type'  => 'time',
        ]);

        $this->crud->addField([
            'name' => 'day_or_night',
            'label' => 'Day, Evening or Night',
            'type'  => 'select_from_array',
            'options' => ['day' => 'दिन', 'eve' => 'शाम', 'night' => 'रात'],
        ]);

        $this->crud->addField([
            'name' => 'blood_group',
            'label' => 'Blood group',
            'type' => 'select_from_array',
            'options' => ['A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'Other' => 'Other']
        ]);

        $this->crud->addField([
            'label' => 'Siklin or Other',
            'name' => 'other_siklin',
            'type' => 'select_from_array',
            'options' => ['yes' => 'हां', 'no' => 'नहीं'],
        ]);


        $this->crud->addField([
            'label' => 'Birth Place',
            'name' => 'birth_place',
            'type' => 'text',
        ]);


        $this->crud->addField([
            'name' => 'qualification',
            'label' => 'Qualification',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'occupation',
            'label' => 'Occupation',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'father_name',
            'label' => "Father's name",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'mother_name',
            'label' => "Mother's name",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'father_occupation',
            'label' => "Father's occupation",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'mother_occupation',
            'label' => "Mother's occupation",
            'type' => 'text'
        ]);        

        $this->crud->addField([
            'name' => 'married_brothers',
            'label' => "Married brothers",
            'type' => 'number'
        ]); 

        $this->crud->addField([
            'name' => 'married_sisters',
            'label' => "Married sisters",
            'type' => 'number'
        ]); 

        $this->crud->addField([
            'name' => 'unmarried_brothers',
            'label' => "Unmarried brothers",
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'unmarried_sisters',
            'label' => "Unmarried sisters",
            'type' => 'number'
        ]); 

        $this->crud->addField([
            'name' => 'current_address',
            'label' => 'Current Address',
            'type' => 'textarea',
        ]);

        $this->crud->addField([
            'name' => 'permenant_address',
            'label' => 'Permenant Address',
            'type' => 'textarea',
        ]);

        $this->crud->addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        $this->crud->addField([
            'name' => 'mobile_no',
            'label' => 'Mobile No.',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password',
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

    public function moderate($id) 
    {
        // dd($id);

        $user =  \App\Models\Users::where('id', $id)->first();

        if ($user->status == 'Active') 
        {
            $user->status = 'Inactive';    
        }
        elseif($user->status == 'Inactive')
        {
            $user->status = 'Active';
        }
        $user->save();

        return redirect()->back();
        // show a form that does something
    }
}
