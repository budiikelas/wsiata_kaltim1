@echo off
echo Setting up NexTrip Git Hooks...
copy /Y "git-hooks\post-merge" ".git\hooks\post-merge"
echo Done! Post-merge hook has been installed.
pause
