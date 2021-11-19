<div class="timer" x-data="timer({{ now()->getPreciseTimestamp(3) }})" x-init="init();">
    <p x-text="time().days"></p>
    <p x-text="time().hours"></p>
    <p x-text="time().minutes"></p>
    <p x-text="time().seconds"></p>
    <div class="grid grid-flow-col gap-5 text-center auto-cols-max">
        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
          <span class="font-mono text-5xl countdown">
            <span :style="`--value:${time().days};`"></span>
          </span>
              days

        </div>
        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
          <span class="font-mono text-5xl countdown">
            <span :style="`--value:${time().hours};`"></span>
          </span>
              hours

        </div>
        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
          <span class="font-mono text-5xl countdown">
            <span :style="`--value:${time().minutes};`"></span>
          </span>
              min

        </div>
        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
          <span class="font-mono text-5xl countdown">
            <span :style="`--value:${time().seconds};`"></span>
          </span>
              sec

        </div>
      </div>

    </div>
</div>

<div>



@push('scripts')
    <script>
        function timer(expiry) {
            return {
                expiry: expiry,
                remaining: null,
                init() {
                    this.setRemaining()
                    setInterval(() => {
                        this.setRemaining();
                    }, 1000);
                },
                setRemaining() {
                    const diff =  new Date().getTime() - this.expiry;
                    this.remaining = parseInt(diff / 1000);
                },
                days() {
                    return {
                        value: this.remaining / 86400,
                        remaining: this.remaining % 86400
                    };
                },
                hours() {
                    return {
                        value: this.days().remaining / 3600,
                        remaining: this.days().remaining % 3600
                    };
                },
                minutes() {
                    return {
                        value: this.hours().remaining / 60,
                        remaining: this.hours().remaining % 60
                    };
                },
                seconds() {
                    return {
                        value: this.minutes().remaining,
                    };
                },
                format(value) {
                    return ("0" + parseInt(value)).slice(-2)
                },
                time() {
                    return {
                        days: this.format(this.days().value),
                        hours: this.format(this.hours().value),
                        minutes: this.format(this.minutes().value),
                        seconds: this.format(this.seconds().value),
                    }
                },
            }
        }
    </script>
@endpush
