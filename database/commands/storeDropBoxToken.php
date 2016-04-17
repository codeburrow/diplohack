<?php namespace Database\commands;

/**
 * @author Rizart Dokollar <r.dokollari@gmail.com
 * @since 4/16/16
 */
use App\DbServices\DropBoxTokenDbService;
use App\Kernel\IoC;
use Dropbox\AppInfo;
use Dropbox\Client;
use Dropbox\WebAuthNoRedirect;

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

$appInfo = AppInfo::loadFromJson(['key' => getenv('DROPBOX_KEY'), 'secret' => getenv('DROPBOX_SECRET')]);
$webAuth = new WebAuthNoRedirect($appInfo, "PHP-Example/1.0");

$authorizeUrl = $webAuth->start();

echo "1. Go to: ".$authorizeUrl."\n";
echo "2. Click \"Allow\" (you might have to log in first).\n";
echo "3. Copy the authorization code.\n";
$authCode = \trim(\readline("Enter the authorization code here: "));

list($accessToken, $dropboxUserId) = $webAuth->finish($authCode);
print "Access Token: ".$accessToken."\n";

$dbxClient = new Client($accessToken, "PHP-Example/1.0");

$dropBoxTokenDbService = IoC::resolve(DropBoxTokenDbService::class);

$dropBoxTokenDbService->create(['token' => $accessToken]);
