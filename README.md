# baconcall
Serves text files to users.<br>
Flagship instance at [videotoaster's website](https://videotoaster.warsawpakt.xyz/baconcall.php).<br>
## Features
- Blocks / and .. access
- Serves plaintext
- Compatible with any sensible webserver
## Installation
- Copy `baconcall.php` to the root of your webserver.
- Ensure that PHP is installed on said webserver.
- Change the line `$bacon_baconfiles = "/etc/bacon/";` to whatever directory you like.
- Ensure that PHP on your webserver has access to this folder, but that it's not in your webserver folder.
- Go to the folder and add `index`. Change it's contents to whatever you like.

> **NOTE**: Technically, adding `index` isn't a required step.<br>
> See below for caveats.

## Troubleshooting
Most of the time, BaconCall would work fine. However, it's not impossible for things to go wrong.<br>
Here is a list of errors and what they mean.
### `BACON/400 (Bad Request)`
This error indicates that there may not be an index file in the baconfile directory. Try adding an index file, or making sure that `$bacon_indexfile` is set properly.
### `BACON/403 (Forbidden)`
**Well, aren't you naughty?** This usually occurs when you attempt to escape the baconfile directory.
### `BACON/404 (Not Found)`
The page which you are requesting doesn't exist.
### `BACON/500 (Internal Error)`
This means that the baconfile directory does not exist.

## Config Options
baconcall.php has several configuration options you can set.
### `$bacon_indexfile`
The filename that the script looks for if there is no requested BID.
### `$bacon_errors`
A list of error messages to display when something goes wrong, in the form of `[ 400, 500, 403, 404 ]`.
### `$bacon_baconfiles`
The directory to serve baconfiles from.
