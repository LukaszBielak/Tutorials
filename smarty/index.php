<?php

include_once 'libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->template_dir = 'template';
$smarty->compile_dir = 'template_c';
$smarty->cache_dir = 'cache';
$smarty->config_dir = 'configs';

$smarty->error_reporting = 1;
$smarty->debugging = true;
$smarty->caching = true;




function art($foo=NULL)
{
    $news=array();
    $news[0]= array('id'=>'0',
                   'tytul'=>'Tytul newsa 1',
                   'autor'=>'Autor1',
                   'zajawka'=>'Zajawka artykulu1',
                   'rozwiniecie'=>'Dalsza czesc artykulu1');
    $news[1]= array('id'=>'1',
                   'tytul'=>'Tytul newsa 2',
                   'autor'=>'Autor2',
                   'zajawka'=>'Zajawka artykulu2',
                   'rozwiniecie'=>'Dalsza czesc artykulu2');
    $news[2]= array('id'=>'2',
                   'tytul'=>'Tytul newsa 3',
                   'autor'=>'Autor4',
                   'zajawka'=>'Zajawka artykulu3',
                   'rozwiniecie'=>'Dalsza czesc artykulu3');
    $news[3]= array('id'=>'3',
                   'tytul'=>'Tytul newsa 4',
                   'autor'=>'Autor4',
                   'zajawka'=>'Zajawka artykulu4',
                   'rozwiniecie'=>'Dalsza czesc artykulu4');
    if($foo == NULL)
        return $news;
    else
        return $news[$foo];
}

if(isset($_GET['n'])){
	$smarty->assign('mode','pelne');
	$news = art($_GET['n']);
}else{
	$news = art();
}

$smarty->assign('news', $news);
$smarty->display('index.tpl');


?>