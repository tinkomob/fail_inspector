<?php

use yii\db\Migration;

/**
 * Class m210311_145136_init_rbac
 */
class m210311_145136_init_rbac extends Migration
{
    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeUp()
    // {
        
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     echo "m210311_145136_init_rbac cannot be reverted.\n";

    //     return false;
    // }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Managing users';
        $auth->add($manageUsers);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manageUsers);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }

    public function down()
    {
        echo "m210311_145136_init_rbac cannot be reverted.\n";

        return false;
    }
    
}
