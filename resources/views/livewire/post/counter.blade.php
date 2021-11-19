

<div class="flex justify-center timer" x-data="timer({{ now()->getPreciseTimestamp(3) }})" x-init="init();">
    <div class="grid grid-flow-col gap-5 text-center auto-cols-max" x-data="{times: [
        'days', 'hours', 'min', 'sec']}">
        <template x-for="(label, index) in times"  :key="index">
            <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content">
                <span class="font-mono text-4xl md:text-8xl countdown">
                    <span :style="`--value:${timeArray()[index]};`"></span>
                </span>
                <div x-text="label"></div>
            </div>
        </template>
    </div>
</div>

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
                    const diff = new Date().getTime() - this.expiry;
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
                timeArray() {
                    return [
                        this.format(this.days().value),
                        this.format(this.hours().value),
                        this.format(this.minutes().value),
                        this.format(this.seconds().value),
                    ]
                },
            }
        }
    </script>
@endpush
