rsync -vztr --delete --chmod=u=rwx --exclude-from="config/rsync_exclude.txt" * apache@88.191.138.248:/home/webapps/maroc3

ssh apache@88.191.138.248 /home/webApps/maroc3/symfony cc