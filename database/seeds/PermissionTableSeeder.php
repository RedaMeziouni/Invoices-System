<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [

    'Invoices',
    'Invoices List',
    'Paid Invoices',
    'UnPaid Invoices',
    'Partial Invoices',
    'Archive Invoices',

    'Reports',
    'Invoices Reports ',
    'Customer Reports',

    'Employees',
    'Employees List ',
    'Employees Permission ',

    'SCM',
    'Departements',
    'Company',


    'Add Invoice',
    'Delete Invoice',
    'Edit Invoice',
    'Export EXCEL',
    'Invoice Status',
    'Archive Invoice',
    'Print Invoice',
    'Add Attachement',
    'Delete Attachement',

    'Add user',
    'Edit user',
    'Delete user',

    'Show permission',
    'Add permission',
    'Edit permission',
    'Delete permission',

    'Add company',
    'Edit company',
    'Delete company',

    'Add departement',
    'Edit departement',
    'Delete departement',
    'Notification',
    
];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}
