echo "Hello World!"

WORK_DIR=$(pwd)
HTML_FILE=$WORK_DIR/email.html
echo $HTML_FILE


#jq n --argfile html "$HTML_FILE" '{html: $html}
jq -n --arg html "$(cat $HTML_FILE)" '{html: $html}' > json_payload.json

curl -X POST -H "Content-Type: application/json" --data-binary @json_payload.json "http://localhost.com/api"

