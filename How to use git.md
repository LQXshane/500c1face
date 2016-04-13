Source: https://www.youtube.com/watch?v=73I5dRucCds

Make sure the files and folders are on the directary on git, use 'cd' to change

1. download github desktop (mac or windows, no linux version), it includes git already:
   https://desktop.github.com/

2. open git shell (terminal like interface)

3. cd to the directary where u want to put github files to, and this will be the master directary. You can have multiple "master"

4. type 'git clone https://github.com/GordonCai/500c1face.git'. This will clone the entire github repository to your computer.

5. To edit 'md' files, use 'vim #####.md'. Check the tutorial from 16:15

6. to uplaod file or folder through git shell:
   1. git add FILE.xxx or FOLDER 
   2. git commit -m "COMMENT" 
   3. git push
   4. git remote add origin https://github.com/GordonCai/500c1face.git (or any branch under master)

7. to delete file:
   replace 'add' with 'rm'

8. to delete folder:
   replace add with rm -r
9. clean up files and directory: 'git clean -dx' and 'git clean -fx'


