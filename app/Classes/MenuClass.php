<?php
namespace App\Classes;
use Auth;
use \App\User;

class MenuClass
{
/*
    ------- Menu Class --------
    A criacao desta classe , se resulta na necessidade de renderizar o menu
    com uma regra de negocio que filtra os links de acordo com as permissoes do
    usuario (admin, moderador,user), ate o momento nao foi encontrada uma forma
    funcional de lidar com as regras no controller , pois se os mesmo forem passados
    desta forma a view perde a referencia da variavel com a chamada de outro controller

*/
    public function Menu()
    {
        $itemsMenu = [
            1 => [
                'name' => 'Principal',
                'class' => 'fa fa-home',
                'identifier' => '',
                'permission' => '1'
            ],
            2 => [
                'name' => 'Registrar Nova Reserva',
                'class' => 'fa fa-search',
                'identifier' => 'indicators/create',
                'permission' => '1'
            ],
            3 => [
                'name' => 'Usuários',
                'class' => 'fa fa-user-circle-o',
                'identifier' => 'users',
                'permission' => '3'
            ],
            4 => [
                'name' => 'Perfis de acesso',
                'class' => 'glyphicon glyphicon-list',
                'identifier' => 'profiles',
                'permission' => '3'
            ],
            5 => [
                'name' => 'Reservas',
                'class' => 'fa fa-list-alt',
                'identifier' => 'indicators',
                'permission' => '1'
            ],
            6 => [
                'name' => 'Logs',
                'class' => 'fa fa-cogs',
                'identifier' => 'logs',
                'permission' => '3'
            ],
            7 => [
                'name' => 'Relatórios',
                'class' => 'glyphicon glyphicon-list',
                'identifier' => 'reports',
                'permission' => '2'
            ],
            8 => [
                'name' => 'Gerenciar Camping',
                'class' => 'fa fa-wrench',
                'identifier' => 'camping',
                'permission' => '3'
            ],
            9 => [
                'name' => 'Localizar dados',
                'class' => 'fa fa-search',
                'identifier' => 'search',
                'permission' => '3'
            ],
            

        ];
        $itemsMenuAfterFilter = [];

        $userAuth = Auth::user();
        
        if($userAuth)
        {
            $userId = Auth::id();
            $userQueryDB = new User;
            $userReturned = $userQueryDB::find($userId);
            $userPermission = $userReturned->profile_id;

            for($count = 1; $count <= sizeof($itemsMenu); $count++)
            {
                if($userPermission >= $itemsMenu[$count]['permission'])
                {
                   $itemsMenuAfterFilter[$count] = $itemsMenu[$count];
                }
            }
        }

        return $itemsMenuAfterFilter;
    }
}
