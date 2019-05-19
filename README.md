# VichUploaderBundleTest756

simple test app for https://github.com/dustin10/VichUploaderBundle/issues/756

setup:
-----------

1. setup database via .env
2. run doctrine:schema:create
2. go to /task/create
3. enter a name and upload two image files

reproduce error:
------------
1. on /task/1/edit enter a name with just one letter
2. tick both or one delete box of the uploaded images
3. click submit, you see that even with validation errors the files (on filesystem public folder) have been removed

see fix:
------------
1. change version of vich/uploader-bundle from dev-master to dev-756-file-remove-queue in composer.json
2. composer update vich/uploader-bundle
3. on /task/1/edit upload two images and submit
4. on /task/1/edit enter a name with just one letter and tick both or one delete box of the uploaded images
5. click submit, you see that files (on filesystem public folder) are not removed when validation errors occur
