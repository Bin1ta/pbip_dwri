<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['title' => "role_access"],
            ['title' => "role_create"],
            ['title' => "role_edit"],
            ['title' => "role_delete"],
            ['title' => "user_access"],
            ['title' => "user_create"],
            ['title' => "user_edit"],
            ['title' => "user_delete"],
            ['title' => "office_setting_access"],
            ['title' => "department_access"],
            ['title' => "department_create"],
            ['title' => "department_edit"],
            ['title' => "department_delete"],
            ['title' => "designation_access"],
            ['title' => "designation_create"],
            ['title' => "designation_edit"],
            ['title' => "designation_delete"],
            ['title' => "document_category_access"],
            ['title' => "document_category_create"],
            ['title' => "document_category_show"],
            ['title' => "document_category_edit"],
            ['title' => "document_category_delete"],
            ['title' => "document_access"],
            ['title' => "document_create"],
            ['title' => "document_show"],
            ['title' => "document_edit"],
            ['title' => "document_delete"],
            ['title' => "category_access"],
            ['title' => "category_create"],
            ['title' => "category_edit"],
            ['title' => "category_delete"],
            ['title' => "slider_access"],
            ['title' => "slider_create"],
            ['title' => "slider_edit"],
            ['title' => "slider_delete"],
            ['title' => "employee_access"],
            ['title' => "employee_create"],
            ['title' => "employee_show"],
            ['title' => "employee_edit"],
            ['title' => "employee_delete"],
            ['title' => "office_detail_access"],
            ['title' => "office_detail_create"],
            ['title' => "office_detail_edit"],
            ['title' => "office_detail_delete"],
            ['title' => "menu_access"],
            ['title' => "menu_create"],
            ['title' => "menu_edit"],
            ['title' => "menu_delete"],
            ['title' => "faq_access"],
            ['title' => "faq_create"],
            ['title' => "faq_edit"],
            ['title' => "faq_delete"],
            ['title' => "link_access"],
            ['title' => "link_create"],
            ['title' => "link_edit"],
            ['title' => "link_delete"],
            ['title' => "bill_access"],
            ['title' => "bill_create"],
            ['title' => "bill_edit"],
            ['title' => "bill_delete"],
            ['title' => "photoGallery_access"],
            ['title' => "photoGallery_create"],
            ['title' => "photoGallery_show"],
            ['title' => "photoGallery_edit"],
            ['title' => "photoGallery_delete"],
            ['title' => 'color_access'],
            ['title' => "ex_employee_access"],
            ['title' => "ex_employee_create"],
            ['title' => "ex_employee_edit"],
            ['title' => "ex_employee_delete"],
            ['title' => "water_consumption_access"],
            ['title' => "water_consumption_create"],
            ['title' => "water_consumption_edit"],
            ['title' => "water_consumption_delete"],
            ['title' => "contract_progress_access"],
            ['title' => "contract_progress_create"],
            ['title' => "contract_progress_edit"],
            ['title' => "contract_progress_delete"],
            ['title' => "current_contract_access"],
            ['title' => "current_contract_create"],
            ['title' => "current_contract_edit"],
            ['title' => "current_contract_delete"],
            ['title' => "finished_contract_access"],
            ['title' => "finished_contract_create"],
            ['title' => "finished_contract_edit"],
            ['title' => "finished_contract_delete"],
            ['title' => "canal_access"],
            ['title' => "canal_create"],
            ['title' => "canal_edit"],
            ['title' => "canal_delete"],
            ['title' => "total_progress_access"],
            ['title' => "total_progress_create"],
            ['title' => "total_progress_edit"],
            ['title' => "total_progress_delete"],
            ['title' => "registration_access"],
            ['title' => "registration_create"],
            ['title' => "registration_edit"],
            ['title' => "registration_delete"],
            ['title' => "administration_access"],
            ['title' => "administration_create"],
            ['title' => "administration_edit"],
            ['title' => "administration_delete"],

        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
