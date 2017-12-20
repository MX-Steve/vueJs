<?php
header("content-type:application/json;charset=utf-8");
header("Access-Control-Allow-Origin:*");
$output = [
    [
        "uid"=>1,
        "uname"=>"ZHANGSAN",
        "age"=>24
    ],
    [
        "uid"=>2,
        "uname"=>"LISI",
        "age"=>20
    ],
    [
        "uid"=>3,
        "uname"=>"WANGWU",
        "age"=>30
    ],
    [
        "uid"=>4,
        "uname"=>"ZHANGSAN1",
        "age"=>14
    ],
    [
        "uid"=>5,
        "uname"=>"ZHANGSAN2",
         "age"=>34
    ]

];

echo json_encode($output);