<?php

if (extension_loaded("pthreads")) {
  echo "Using pthreads\n";
} else  echo "Using polyfill\n";

$thread = new class extends Thread {
	public function run() {
		echo "Hello World\n";
	}
};

$thread->start() && $thread->join();
?>