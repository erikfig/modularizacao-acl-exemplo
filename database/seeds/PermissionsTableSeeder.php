<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Listar grupos',
            'Criar grupos',
            'Editar grupos',
            'Remover grupos',
            'Listar Produtos',
            'Criar Produtos',
            'Editar Produtos',
            'Remover Produtos',
            'Listar Usuários',
            'Criar Usuários',
            'Editar Usuários',
            'Remover Usuários',
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
