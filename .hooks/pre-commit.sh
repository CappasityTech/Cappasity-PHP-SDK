#!/bin/sh

echo "[pre-commit hook] Running the linter before committing:"

sh ./bin/lint.sh
