<?php
/**
 * Created by PhpStorm.
 * User: feich
 * Date: 2019/3/21
 * Time: 11:51
 */
// 数据库连接


// 增删改
function my_idu($sql)
{
    $link = mysqli_connect("localhost","studentadmin","12345","studentroom");
// 选择数据库
    $link->set_charset('utf8');
    // 执行传入的sql语句
    mysqli_query($link, $sql);
    // 获取行数
    $rowNum = mysqli_affected_rows($link);
    // 关闭连接
    mysqli_close($link);
    // 返回
    return $rowNum;
}
// 查询
function my_query($sql)
{
    $link = mysqli_connect("localhost","studentadmin","12345","studentroom");
// 选择数据库
    $link->set_charset('utf8');
    // 执行传入的sql语句
    $result = mysqli_query($link, $sql);
    // 解析结果
    if(!$result)
        return null;
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // 关闭连接
    mysqli_close($link);
    // 返回
    return $data;
}
