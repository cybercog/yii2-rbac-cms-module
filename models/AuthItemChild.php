<?php
/**
 * MyClass class file.
 * @copyright (c) 2014, Galament
 * @license http://www.opensource.org/licenses/bsd-license.php
 */


namespace bariew\rbacModule\models;

use Yii;
use \common\models\ActiveRecord;
/**
 * This is the model class for table "auth_item_child".
 *
 * @property string $parent
 * @property string $child
 *
 * @property AuthItem $role
 * @property AuthItem $permission
 */
class AuthItemChild extends ActiveRecord
{
    /**
     * Gets role list.
     * @return array list
     */
    public static function roleList()
    {
        return AuthItem::roleList();
    }
    
    /**
     * Gets permission list.
     * @return array list
     */
    public static function permissionList()
    {
        return AuthItem::permissionList();
    }    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('modules/rbac', 'rbac_role'),
            'child'  => Yii::t('modules/rbac', 'rbac_permission'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'child']);
    }
}
