echo 'YvdPhe49nFG2'
rsync -vztr --delete --chmod=ug=rwx --exclude-from="config/rsync_exclude.txt" * apache@88.191.138.248:/home/webapps/maroc3
echo 'YvdPhe49nFG2'
ssh apache@88.191.138.248:/home/webapps/maroc3/symfony cc
pause
