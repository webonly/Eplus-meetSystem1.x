<?php
return [
    'components' => [
         'db' => [  //总的数据库连接
            'class' => 'yii\db\Connection', 
            'dsn' => 'sqlsrv:server=localhost;database=shmda',
            'username' => 'sa',
            'password' => '123456',
            'charset' => 'utf-8',
        ], 
        'secondDb' => [  //麻醉科数据库连接
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:server=localhost;database=MISD.SHMDA.SP.Anesth',
            'username' => 'sa',
            'password' => '123456',
            'charset' => 'utf-8',
        ],
        'threeDb' => [  //眼科数据库连接
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:server=localhost;database=MISD.SHMDA.SP.Ophth',
            'username' => 'sa',
            'password' => '123456',
            'charset' => 'utf-8',
        ],        
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'bincheng101',
                'password' => 'Christi19930122',
                'port' => '25',
                'encryption' => 'tls',

            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['bincheng101@163.com'=>'admin']
            ],
            'useFileTransport' => false,//false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件

        ],
    ],
];
