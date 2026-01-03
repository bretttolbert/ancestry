# ancestry

## Simple web site to display the ancestry of a specific person or persons

# [demo](https://bretttolbert.com/assets/projects/ancestry/index.php)

Use case: You want to take the genealogical information you've collected from various sources and display it on a web site in a presentable format so you can share it with family etc. 

The intent of this project is only to display direct ancestors and not siblings, cousins, aunts and uncles, etc. Although such info may be included in the bio HTML for each ancestor.

This is a very rudimentary implementation that I hacked together for my personal use, but I figured I'd share it just in case anyone wants to copy my ancestry site.

The idea is that each folder in the folder hierarchy represents an ancestor. So the longer the path, the further back you're going into the person's ancestry.

E.g. [Brett Tolbert/Craig Tolbert/Andrew E Tolbert/William Arzo Tolbert/William Monroe Tolbert/Cornelius Tolbert/Hezekiah Tolbert Jr/Hezekiah Tolbert/Sarah Wells/Rachael Langston/Leonard Langston/Katherine Mountford](https://bretttolbert.com/assets/projects/ancestry/Brett%20Tolbert/Craig%20Tolbert/Andrew%20E%20Tolbert/William%20Arzo%20Tolbert/William%20Monroe%20Tolbert/Cornelius%20Tolbert/Hezekiah%20Tolbert%20Jr/Hezekiah%20Tolbert/Sarah%20Wells/Rachael%20Langston/Leonard%20Langston/Katherine%20Mountford/)

This project makes heavy use of relative symlinks. It also uses PHP (for nostalgia). For initial setup and updates, you must run the `dev/build.sh` script which creates relative symlinks to `dev/index.php` in every subdirectory. 

Also you can create symlinks directories to resolve any loops in your family tree, as demonstrated in this example.

You will need to update the stylesheet path in `dev/index.php` for your specific web root path:

```html
<link rel="stylesheet" href="/assets/projects/ancestry/ancestry.css">
```
