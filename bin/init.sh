source "config.sh";
# requires config file with SERVER, WEBROOT, and STAGING variables defined
echo $SERVER:$WEBROOT$STAGING;
cat config.sh >> installStaging.sh;
cat stagingScript.sh >> installStaging.sh;
cat installStaging.sh | ssh $SERVER /bin/bash;
git remote add staging $SERVER:$WEBROOT$STAGING/$STAGING.git;
rm installStaging.sh;