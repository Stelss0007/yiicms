<?php

use app\modules\group\models\Group;
use app\modules\user\Module;
use Stelssoft\YiiCmsCore\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="x_panel">
        <div class="x_title">
            <h3>
                <?php echo Module::t('Users List');?>
            </h3>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="text-right">
                <?= Html::a(Module::t('Create User'), ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a(Module::t('Configuration'), ['configuration'], ['class' => 'btn btn-default']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\CheckboxColumn'],
                    ['class' => SerialColumn::class],
                    'id',
                    'name',
                    'email',
                    [
                        'attribute' => 'group.name',
                        'filter' => ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name'),
                    ],
                    'createdAt:datetime',
                    'updatedAt:datetime',
                    'lastLoggedInAt:datetime',
//                    'createdBy',
//                    'updatedBy',

                    ['class' => ActionColumn::class],
                ],
            ]); ?>
        </div>
    </div>
</div>
