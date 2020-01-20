#!/bin/sh

# Enable pre-commit hook
cp .hooks/pre-commit.sh .git/hooks/pre-commit
chmod +x .git/hooks/pre-commit

# Enable post-commit hook
cp .hooks/post-commit.sh .git/hooks/post-commit
chmod +x .git/hooks/post-commit
