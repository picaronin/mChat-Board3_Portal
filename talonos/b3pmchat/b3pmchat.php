<?php
/**
*
* @package Board3 Portal v2.1+ - mchat on portal
* @copyright (c) Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @mchat on portal by Talonos @ http://pretereo-stormrage.co.uk
*/

namespace talonos\b3pmchat;

/**
* @package mchat
*/

class b3pmchat extends \board3\portal\modules\module_base
{
	public $columns = 21;
	public $name = 'PORTAL_MCHAT_TITLE';
	public $image_src = '';
	public $language = array(
						'vendor'	=> 'talonos/b3pmchat',
						'file'		=> 'common',
						);

	/** @var \phpbb\config\config */
	protected $config;

	/** @var user */
	protected $user;

	/** @var auth */
	protected $auth;

	/** @var template */
	protected $template;

	/** @var mchat */
	protected $mchat;

	/** @var settings */
	protected $settings;

	/** @var string */
	protected $form_name = '';

	/** @var bool */
	protected $custom_form_token = false;

	/** @var bool */
	protected $is_archive_page = false;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config $config phpBB config
	 * @param user		$user
	 * @param auth		$auth
	 * @param template	$template
	 * @param mchat		$mchat
	 * @param settings	$settings
	 */
	public function __construct(
		$config,
		\phpbb\user $user,
		$auth,
		$template,
		$mchat = null,
		$settings = null
	)
	{
		$this->config = $config;
		$this->user		= $user;
		$this->auth		= $auth;
		$this->template	= $template;
		$this->mchat	= $mchat;
		$this->settings	= $settings;
	}

	/**
	 * @return array
	 */

	protected function add_mchat($mode)
	{
		// We use the page_index() method later to render mChat
		// so we need to enable mChat on the index page only for this request
		$this->user->data['user_mchat_index'] = 1;
		$this->settings->set_cfg('mchat_index', 1, true);

		// Render mChat
		$this->mchat->page_index();

		// Amend some template data
		$this->template->assign_vars(array(
			'MCHAT_PAGE'			=> $mode,
			'MCHAT_INDEX_HEIGHT'	=> $this->settings->cfg('mchat_index_height'),
		));
	}

	public function get_template_center($module_id)
	{
		$this->add_mchat('index');
		$this->template->assign_vars(array(
			'S_DISPLAY_MCHAT_PORTAL_PLACEHOLDER' => ($this->config['mchat_on_portal']) ? true : false,
		));

		return '@talonos_b3pmchat/mchat_portal.html';
	}

	public function get_template_acp($module_id)
	{
		return array(
				'title'	=> 'PORTAL_MCHAT_TITLE',
				'explain'	=> true,
					'vars'	=> array(
							'legend1'			=> 'PORTAL_MCHAT_TITLE',
							'mchat_on_portal'	=> array('lang' => 'PORTAL_MCHAT_TITLE', 'validate' => 'string', 'type' => 'radio:yes_no', 'explain' => true),
					)
		);
	}

	/**
	* API functions
	*/
	public function install($module_id)
	{
		$this->config->set('mchat_on_portal', 1);
		return true;
	}

	public function uninstall($module_id, $db)
	{
		$this->config->delete('mchat_on_portal');
		return true;
	}
}
