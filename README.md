# VichUploaderBundleTest756

simple test app for https://github.com/dustin10/VichUploaderBundle/issues/756

setup:
-----------

1. setup database via .env
2. run doctrine:mig:mig
2. go to /task/create
3. enter a name and upload two image files

reproduce error:
------------
1. on /task/1/edit enter a name with just one letter
2. tick both or one delete box of the uploaded images
3. click submit, you see that even with validation errors the files have been removed

see fix:
------------
1. change version of vich/uploader-bundle from dev-master to dev-756-file-remove-queue
2. composer install
3. on /task/1/edit upload two images and submit
4. on /task/1/edit enter a name with just one letter
5. tick both or one delete box of the uploaded images
6. click submit, you see that files are not removed when validation errors occur
