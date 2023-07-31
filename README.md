# Mission-Local-Liveblog-Adaptor

[Release Notes](#release-notes)

[Overview](#overview)

[Procedure for converting liveblog](#procedure-for-converting-liveblog)

## Release Notes

1.0.0 Initial release

## Overview
The Mission Local website uses Liveblog24 to record blog entries as they are
happening and store them in with an article. Once the recording is done readers
of the article will see the most recent block of blog entries with an option to
load additional blocks of blog entries. Each blog entry has the option to be
upvoted by clicking on a pair of clapping hands. The blog entry may also be
shared on social media by clicking on a Share button.

Mission Local has the following issues with the Liveblog24 approach
1. If Liveblog24 ever goes out of business all of our content is stored on their
servers and would no longer be available to their readers
1. The Liveblog24 script for displaying the blog entries takes time to load.
Until the entries are loaded the page appears to not have any blog entries
1. To see all of the live blog entries the user must press Load More multiple
times
1. Because the content takes time to load, and only the most recent blog entries
are loaded by default, Google indexing does not include the blog content.

By installing this plugin and following the procedure below the blog contents
are moved from Liveblog24 and stored directly in the article. The benefits are
roughly the opposite of the drawbacks listed above.
1. The live blog contents are stored on Mission Local servers rather than
Liveblog24
1. The contents are available immediately and entirely
1. When Google indexes the site, the entire live blog content will be scanned

The drawbacks are the following
1. The clapping hands upvoting is frozen at the point when the snapshot of the
live blogging is taken
1. The Share button is disabled and hidden

## Procedure for converting liveblog

1. Open the article with the Liveblog24 contents
1. Go to the Liveblog24 content and load it all by repeatedly pressing
`LOAD MORE` until you can no longer load any more content
1. Use Chrome to inspect the source. On Windows and Linux this is done by
pressing `Ctrl-Shift-C`
1. Search for the html element, `<div id="LB24">`
1. Copy the entire element. This can be done by right-clicking and selecting
**Copy ▸ Copy Element**
1. Edit the Post
1. Scroll down to the html block that contains the Liveblog24 script. It should
look something like the following
    ```
    <div id="LB24_LIVE_CONTENT" data-eid="3328021676610147955"></div>
    <script src="https://v.24liveblog.com/24.js"></script>
    ```
1. Comment out the existing script by adding `<!--` and `-->` as follows
    ```
    <!-- <div id="LB24_LIVE_CONTENT" data-eid="3328021676610147955"></div>
    <script src="https://v.24liveblog.com/24.js"></script> -->
    ```
1. Paste in the data that was copied above
    ```
    <!-- <div id="LB24_LIVE_CONTENT" data-eid="3328021676610147955"></div>
    <script src="https://v.24liveblog.com/24.js"></script> -->
    <div id="LB24"><div data-v-b1e58480="" eid="3328021676610147955"><div data-v-b1e58480="" class="lb24-liveblog-container">...
    ```
1. At the bottom of the pasted data you will find the white-label classes
    ```
    <p data-v-4cb0df0c="" class="lb24-liveblog-white-label" style="display: flex !important; align-items: center !important; opacity: 1 !important; visibility: visible !important; height: 24px !important;">
    ...
    <img data-v-4cb0df0c="" src="https://cdn.24liveblog.com/images/logo.bar.png" alt="24liveblog"></a></p></div>
    ```
1. Replace the opening and closing `<p>` tags with `<div>`. (Chrome doesn't like
the `display: flex` in combination with `<p>` tags and will change the html)
    ```
    <div data-v-4cb0df0c="" class="lb24-liveblog-white-label" style="display: flex !important; align-items: center !important; opacity: 1 !important; visibility: visible !important; height: 24px !important;">
    ...
    <img data-v-4cb0df0c="" src="https://cdn.24liveblog.com/images/logo.bar.png" alt="24liveblog"></a></div></div>
    ```
1. Publish the page