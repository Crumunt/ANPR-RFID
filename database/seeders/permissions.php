<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class permissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vehicle_management = [
            'view_vehicle',
            'add_vehicle',
            'edit_vehicle',
            'delete_vehicle',
            'view_vehicle_history',
        ];

        $record_management = [
            'view_record',
            'add_record',
            'edit_record',
            'delete_record',
            'export_record',
        ];
        
        $gate_pass_management = [
            'issue_gate_pass',
            'revoke_gate_pass',
            'view_gate_pass'
        ];

        $user_role_management = [
            'view_user',
            'add_user',
            'edit_user',
            'delete_user',
            'assign_role',
            'view_user_history',
        ];

        $report_management = [
            'view_report',
            'generate_report',
            'export_report',
        ];
        
        $system_management = [
            'view_system_logs',
            'clear_system_logs',
            'manage_settings',
        ];
        
        $permissions = [
            'vehicle_management' => $vehicle_management,
            'record_management' => $record_management,
            'gate_pass_management' => $gate_pass_management,
            'user_role_management' => $user_role_management,
            'report_management' => $report_management,
            'system_management' => $system_management,
        ];
        
        foreach ($permissions as $group => $permission_list) {
            foreach ($permission_list as $permission) {
                Permission::create([
                    'permission_name' => $permission,
                ]);
            }
        }
    }
}
