#!/bin/bash
now="$(date +'%d_%m_%Y_%H_%M_%S')"
desc="Commit From Server $now"
git add .
git commit -m "$desc"
git push https://SandyMaull:kucing532***@github.com/SandyMaull/bemftuts.git --all
