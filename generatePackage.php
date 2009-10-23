<?php

require_once('PEAR/PackageFileManager2.php');

PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2;

$packagexml->setOptions(array(
    'baseinstalldir'    => '/',
    'simpleoutput'      => true,
    'packagedirectory'  => './',
    'filelistgenerator' => 'file',
    'ignore'            => array('generatePackage.php'),
    'dir_roles' => array(
        'tests'     => 'test',
        'examples'  => 'doc'
    ),
));

$packagexml->setPackage('Services_ShortURL');
$packagexml->setSummary('Abstract PHP5 interface for shortening and expanding short URLs');
$packagexml->setDescription('Short URL services have become enormously popular on the internet. There are, literally, dozens (hundreds?) of these services. Services_ShortURL offers an abstract way of shortening and expanding URLs.');

$packagexml->setChannel('pear.php.net');
$packagexml->setAPIVersion('0.1.0');
$packagexml->setReleaseVersion('0.1.0');

$packagexml->setReleaseStability('alpha');

$packagexml->setAPIStability('alpha');

$packagexml->setNotes('* initial release');
$packagexml->setPackageType('php');
$packagexml->addRelease();

$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'shupp@php.net');

$packagexml->setLicense('New BSD License',
                        'http://www.opensource.org/licenses/bsd-license.php');

$packagexml->setPhpDep('5.0.0');
$packagexml->setPearinstallerDep('1.4.0b1');
$packagexml->addPackageDepWithChannel('required', 'PEAR', 'pear.php.net', '1.4.0');
$packagexml->addPackageDepWithChannel('required', 'HTTP_Request2', 'pear.php.net');
$packagexml->addPackageDepWithChannel('required', 'Net_URL2', 'pear.php.net',
                                      '0.2.0');
$packagexml->addExtensionDep('required', 'SimpleXML'); 
$packagexml->addExtensionDep('required', 'pcre'); 
$packagexml->addExtensionDep('required', 'SPL'); 


$packagexml->generateContents();
$packagexml->writePackageFile();

?>
