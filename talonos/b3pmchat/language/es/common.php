<?php
/**
 *
 * @package phpBB Extension - mChat
 * @copyright (c) 2015 dmzx - http://www.dmzx-web.net
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'PORTAL_MCHAT_TITLE'		=> 'mChat en Board3 Portal',
	'PORTAL_MCHAT_TITLE_EXP'	=> '<div style="color: #AA0000;">Para editar las opciones de mChat, vaya a<br>ACP -> Extensiones -> mChat</div>',
	'B3PMCHAT_INSTALL_ERROR'	=> '“mChat on Board3 Portal” 3.3.0 no se puede instalar.<br><br>- Se requiere phpBB 3.3.0 o posterior.',
	'B3PMCHAT_PHP_ERROR'		=> '“mChat on Board3 Portal” 3.3.0 no se puede instalar.<br><br>- Se requiere php 7.1.3 o posterior.',
	'B3PMCHAT_ACTIVATED'		=> '“mChat on Board3 Portal” 3.3.0 no se puede instalar.<br><br>- Se requiere instalada y HABILITADA la extension “mChat” 2.1.0 o posterior.',
	'B3PMCHAT_UPGRADE'			=> '“mChat on Board3 Portal” 3.3.0 no se puede instalar.<br><br>Se ha localizado la instalación de una versión obsoleta de la extension “mChat”.<br><br>Antes de instalar “mChat on Board3 Portal” 3.3.0, es necesario actualizar la versión %1$s de “mChat” a su version 2.1.0 o posterior.',
));
