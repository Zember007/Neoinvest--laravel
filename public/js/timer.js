function timer(currentSeconds, defaultSeconds) {
    return {
        currentSeconds,
        defaultSeconds,
        expiresAt: null,
        remaining: null,
        init() {
            this.expiresAt = new Date()
            this.expiresAt.setSeconds(this.expiresAt.getSeconds() + this.currentSeconds)
            this.setRemaining()
            setInterval(() => {
                this.setRemaining()
            }, 1000)
        },
        reset() {
            this.currentSeconds = this.defaultSeconds
            this.init()
        },
        setRemaining() {
            let diff = this.expiresAt.getTime() - new Date().getTime()
            if (diff < 0) {
                diff = 0;
            }
            this.remaining = parseInt(diff / 1000)
        },
        days() {
            return {
                value: this.remaining / 86400,
                remaining: this.remaining % 86400
            }
        },
        hours() {
            return {
                value: this.days().remaining / 3600,
                remaining: this.days().remaining % 3600
            }
        },
        minutes() {
            return {
                value: this.hours().remaining / 60,
                remaining: this.hours().remaining % 60
            }
        },
        seconds() {
            return {
                value: this.minutes().remaining,
            }
        },
        format(value) {
            return ('0' + parseInt(value)).slice(-2)
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
