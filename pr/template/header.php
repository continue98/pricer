<? 
session_start();
include 'connect.php';
function headerOut($tabTitle, $metaTitle, $description, $keywords, $root, $curmenu){ ?>
<html>
	<head>
		<title><?=$tabTitle?></title>
		<meta name="Title" content="<?=$metaTitle?>">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="<?=$description?>">
		<meta name="keywords" content="<?=$keywords?>">

		<script type="text/javascript" src="<?=$root?>/template/fancybox/lib/jquery-1.10.1.min.js"></script>

		<script type="text/javascript" src="<?=$root?>/template/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

		<script type="text/javascript" src="<?=$root?>/template/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>

		<script type="text/javascript" src="<?=$root?>/template/fancybox/script.js"></script>

		<link rel="stylesheet" type="text/css" href="<?=$root?>/template/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

		<script type="text/javascript" src="<?=$root?>/template/tablesorter/js/jquery.tablesorter.min.js"></script>
		<script type="text/javascript" src="<?=$root?>/template/js/default.js"></script>

		<script type="text/javascript" src="<?=$root?>/template/js/script.js"></script>

		<link rel="stylesheet" href="<?=$root?>/template/css/default.css"/>

		<link rel="stylesheet" href="<?=$root?>/template/css/style.css"/>
		
		<link rel="stylesheet" href="<?=$root?>/template/tablesorter/default.css"/>
		<link rel="stylesheet" href="<?=$root?>/template/tablesorter/jquery.tabs.css"/>
		<link rel="stylesheet" href="<?=$root?>/template/tablesorter/jquery.tabs-ie.css"/>

		<link rel="stylesheet" href="../template/jstree/themes/default/style.min.css" />
<style>
		html, body { background:#ebebeb; font-size:10px; font-family:Verdana; margin:0; padding:0; }
		#container { min-width:320px; margin:0px auto 0 auto; background:white; border-radius:0px; padding:0px; overflow:hidden; }
		#tree { float:left; min-width:319px; border-right:1px solid silver; overflow:auto; padding:0px 0; }
		#data { margin-left:320px; }
		#data textarea { margin:0; padding:0; height:100%; width:100%; border:0; background:white; display:block; line-height:18px; resize:none; }
		#data, #code { font: normal normal normal 12px/18px 'Consolas', monospace !important; }

		#tree .folder { background:url('../template/jstree/file_sprite.png') right bottom no-repeat; }
		#tree .file { background:url('../template/jstree/file_sprite.png') 0 0 no-repeat; }
		</style>

	</head>

	<body>

		<div id="wrap" class="container clr">

			<header id="masthead" class="site-header clr" role="banner">
					<a style="display: inline-block;" title="Ценовичок - аналитика цен на товары" href="<?=$root?>/">

						<img alt="" style="padding: 20px; height: 80px;" src="<?=$root?>/images/logo.jpg">

						<span style="position: absolute; color: #842816; text-decoration: none;" >

							<b><span style="display: inline-block; font-size: 46px; margin-top: 20px;">Ценовичок&nbsp;-&nbsp;</span><span style="display: inline-block; font-size: 34px; margin-bottom: 0;"> аналитика цен на товары</span></b>

						</span>

					</a>
			</header>
			<div id="navbar" class="navbar clr">
				<?if($_REQUEST['user'] == 'exit'){	//echo "<script>alert ('exit');</script>";
					unset($_SESSION['user']);
					//setcookie('user_login', '', time() + 3600 * 24 * 30);
					//setcookie('user_password', '', time() - 1);
					//setcookie('autorisation', '', time() - 1);
					setcookie('user_login', '', time() - 1, '/');
					setcookie('user_password', '', time() - 1, '/');
					$no_user_autorise = 'Y';
				}/*elseif(strlen($_COOKIE['user_login']) > 0 && strlen($_COOKIE['user_password']) > 0 && $no_user_autorise != 'Y' && !$_SESSION['user']['id']){
					$stmt = $db->prepare("SELECT id FROM pr_users WHERE login = ? AND password = ?");
					$stmt->execute(array(trim(htmlspecialchars($_COOKIE['user_login'])), trim($_COOKIE['user_password'])));
					if(!($user_id = $stmt->fetchColumn())){
						$_SESSION['user']['id'] = $user_id;
						setcookie("user_login", $_COOKIE['user_login'], time() + 3600 * 24 * 30, '/');
						setcookie("user_password", $_COOKIE['user_password'], time() + 3600 * 24 * 30, '/');
					}else{
						setcookie('user_login', '', time() - 1, '/');
						setcookie('user_password', '', time() - 1, '/');
						$no_user_autorise = 'Y';
					}
				}*/?>

				<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
					<div class="menu-top-main-container">
						<ul id="menu-top-main" class="nav-menu dropdown-menu">
					<?
					foreach (array(
						'Новости' => '/', 
						'Товары' => '/products/', 
						'Магазины' => '/shops/', 
						'Умная форма' => '/smart_form/', 
						'Аналитика' => '/analytics/', 
						'Контакты' => '/contacts/', 
					) as $k => $v){
						echo '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home'
						  .(($curmenu == $k)?' current-menu-item':'')
						  .'">
							<a href="'.$root.$v.'">'.$k.'</a>
						</li>';
					}
					if ($_SESSION['user']['id']){
						echo '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home'
						.(($curmenu == "Личный кабинет")?' current-menu-item':'')
						.'">
							<a class="fancybox" href="'.$root.'/cabinet/">Личный кабинет</a>
						</li>';
					}else{
						echo '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home">
							<a class="fancybox" href="#auth_form">Авторизация</a>
						</li>';
					}
					?>
						</ul>
					</div>
				</nav>
			</div>

			<div id="main" class="site-main row clr fitvids">
<? } ?>