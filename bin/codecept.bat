@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/composer/codeception/codeception/codecept
php "%BIN_TARGET%" %*
