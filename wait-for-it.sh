host=$1
shift
port=$1
shift
cmd=$@

while ! nc -z $host $port; do
  echo "Waiting for $host:$port..."
  sleep 2
done

echo "$host:$port is ready"
exec $cmd
