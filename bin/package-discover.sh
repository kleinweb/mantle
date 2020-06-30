#!/usr/bin/env bash

# Run the Mantle package:discover command through wp-cli if it exists.
#
# Fails gracefully if wp-cli does not exist.

if ! type "wp" > /dev/null 2>&1; then
	echo "wp-cli not found, skipping package discovery..."
	exit
fi

wp mantle package:discover
