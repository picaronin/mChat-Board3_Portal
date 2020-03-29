<?php
/**
* @package mChat addon Pop Up Extension
* @copyright (c) 2015 dmzx - http://dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace talonos\b3pmchat;

/**
* @ignore
*/

class ext extends \phpbb\extension\base
{
	/**
	 * Check whether or not the extension can be enabled.
	 *
	 * @return bool
	 * @access public
	 */

	public function is_enableable()
	{
		$config = $this->container->get('config');
		$lang = $this->container->get('language');        
		$db = $this->container->get('dbal.conn');
		$ext_manager = $this->container->get('ext.manager');
		$lang->add_lang('common', 'talonos/b3pmchat');

		/**
		 * Check phpBB requirements
		 *
		 * Requires phpBB 3.3.0 or greater
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.
		if (!phpbb_version_compare($config['version'], '3.3.0', '>='))
		{
			// Suppress the error in case of CLI usage
			@trigger_error($lang->lang('B3PMCHAT_INSTALL_ERROR'), E_USER_WARNING);
		}

		/**
		 * Check PHP requirements
		 *
		 * Requires PHP 7.1.3 or greater
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.
		if (!phpbb_version_compare(PHP_VERSION, '7.1.3', '>='))
		{
			// Suppress the error in case of CLI usage
			@trigger_error($lang->lang('B3PMCHAT_PHP_ERROR'), E_USER_WARNING);
		}

		/**
		 * Check mChat requirements
		 *
		 * Requires mChat enabled
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.
		if ($ext_manager->is_enabled('dmzx/mchat') != 'true')
		{
			@trigger_error($lang->lang('B3PMCHAT_ACTIVATED'), E_USER_WARNING);
		}
        
		/**
		 * Check mChat requirements version
		 *
		 * Requires Board3 Portal greater of 2.1.0
		 *
		 * @return bool
		 */
		// Display a custom warning message if requirement fails.        
		$sql = 'SELECT config_value FROM ' . CONFIG_TABLE . " WHERE config_name = 'mchat_version'";
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			if (phpbb_version_compare($row['config_value'], '2.1.0', '<'))
			{
				// Suppress the error in case of CLI usage
				@trigger_error($lang->lang('B3PMCHAT_UPGRADE', $row['config_value']), E_USER_WARNING);
			}
		}
		$db->sql_freeresult($result);

		return true;
	}
}