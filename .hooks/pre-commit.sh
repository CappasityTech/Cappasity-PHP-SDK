#!/bin/sh

echo "[pre-commit hook] Running linter before commit:"

sh ./bin/lint.sh
