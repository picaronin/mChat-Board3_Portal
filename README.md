[![phpBB](https://www.phpbb-es.com/foro/styles/flat-style/theme/images/logo_new_small.png)](https://www.phpbb-es.com)
# [3.3.x][Ext][3.3.0] mChat on Board3 Portal
This extension will allow you to have mChat displayed on your board3 portal (requires mChat 2.1.0+ installed).
Block can be used in Top/Center/Bottom only.

#### IF UPGRADING "mChat" DISABLE "mChat no Board3 Portal" extension BEFORE DOING SO or you can get locked out of ACP

Below setting in mChat configuration IS REQUIRED to have mChat display on board3 portal:

   - `Display mChat on the index page: Yes`

## Requirements
* phpBB >= 3.3.0
* PHP >= 7.1.3
* mChat 2.1.0+ -> ( Download from [HERE](https://www.phpbb.com/customise/db/extension/mchat_extension/) ) -> !Important

## Install
1. Download the latest release.
2. In the `ext` directory of your phpBB board, copy the `talonos/b3pmchat` folder. It must be so: `/ext/talonos/b3pmchat`
4. Navigate in the ACP to `Customise -> Manage extensions`.
5. Look for `mChat on Board3 Portal` under the Disabled Extensions list, and click its `Enable` link.
6. Add the module to your portal via the menu at ACP -> Extensions -> Portal -> Portal Modules -> Add modules -> 'mChat on Board3 Portal' (top/center or bottom modules only).

## Uninstall
1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `mChat on Board3 Portal` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/talonos/b3pmchat` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)
