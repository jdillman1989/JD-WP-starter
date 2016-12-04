
cd $WEBROOT$STAGING;

echo "Installing WordPress";
wget http://wordpress.org/latest.tar.gz;
tar xfz latest.tar.gz;
mv wordpress/* ./;
rmdir ./wordpress/;
rm -f latest.tar.gz;

echo "Installing Git deployment";
mkdir $STAGING.git;
cd $STAGING.git;
git init --bare;
cd hooks;
touch post-receive;
echo "#!/bin/sh
unset GIT_DIR;
export GIT_WORK_TREE=$WEBROOT$STAGING/app;
export GIT_DIR=$WEBROOT$STAGING/$STAGING.git;
git checkout -f master;
cd $WEBROOT$STAGING/app;
gulp;
rsync -r $WEBROOT$STAGING/app/wp-content/* $WEBROOT$STAGING/wp-content/" >> post-receive;

echo "Installing Gulp";
cd $WEBROOT$STAGING;
mkdir app;
cd app;
touch package.json;
echo '{
  "name": "Jadle",
  "version": "1.1.0",
  "devDependencies": {
    "gulp": "^3.9.0",
    "gulp-autoprefixer": "^0.0.10",
    "gulp-combine-mq": "^0.4.0",
    "gulp-css-globbing": "^0.1.2",
    "gulp-newer": "^0.3.0",
    "gulp-sass": "^2.0.4",
    "gulp-uglify": "^1.0.1"
  }
}' >> package.json;
npm install;

echo "Setting up deployments";
cd $WEBROOT$STAGING/$STAGING.git/hooks;
chmod 775 post-receive;
echo "Complete";