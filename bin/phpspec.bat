@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/composer/phpspec/phpspec/bin/phpspec
php "%BIN_TARGET%" %*
