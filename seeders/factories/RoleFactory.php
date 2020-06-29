<?php

declare(strict_types=1);

use App\Constants\State\RoleState;
use App\Dao\Role\RoleDao;

/**
 * Multi-user mall
 *
 * @link     https://store.yii.red
 * @document https://document.store.yii.red
 * @contact  8257796@qq.com
 */

class RoleFactory
{
    public static function run()
    {
        $dao = new RoleDao();
        $dao->create([
            'id' => 1,
            'parent_id' => 0,
            'name' => RoleState::getMessage(RoleState::IDENTIFIER_SYSTEM_ADMINISTRATOR, 'identifier', '超级管理员'),
            'identifier' => RoleState::IDENTIFIER_SYSTEM_ADMINISTRATOR,
            'is_super' => RoleState::IS_SUPER_TRUE,
            'status' => RoleState::STATUS_ENABLED
        ]);

        $dao->create([
            'id' => 2,
            'parent_id' => 0,
            'name' => RoleState::getMessage(RoleState::IDENTIFIER_ADMINISTRATOR, 'identifier', '管理员'),
            'identifier' => RoleState::IDENTIFIER_ADMINISTRATOR,
            'is_super' => RoleState::IS_SUPER_FALSE,
            'status' => RoleState::STATUS_ENABLED
        ]);

        $dao->create([
            'id' => 3,
            'parent_id' => 0,
            'name' => RoleState::getMessage(RoleState::IDENTIFIER_GUEST, 'identifier', '游客'),
            'identifier' => RoleState::IDENTIFIER_GUEST,
            'is_super' => RoleState::IS_SUPER_FALSE,
            'status' => RoleState::STATUS_ENABLED
        ]);
    }
}
