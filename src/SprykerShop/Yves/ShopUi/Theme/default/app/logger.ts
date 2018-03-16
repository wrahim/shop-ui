import { AppConfig, AppLogLevel } from './config';

const DUMMY_FUNCTION = function () { };

export default class Logger {
    protected readonly config: AppConfig

    constructor(config: AppConfig) {
        this.config = config;

        if (this.config.log.level < AppLogLevel.VERBOSE) { 
            this.debug = DUMMY_FUNCTION;
        }

        if (this.config.log.level < AppLogLevel.DEFAULT) {
            this.log = DUMMY_FUNCTION;
        }

        this.log('application log level:', AppLogLevel[this.config.log.level]);
    }

    protected prefix(type: string): string { 
        return `[${this.config.log.prefix}@${type}]`;
    }

    debug(...args): void {
        console.debug(this.prefix('debug'), ...args);
    }

    log(...args): void {
        console.log(this.prefix('log'), ...args);
    }

    info(...args): void {
        console.info(this.prefix('info'), ...args);
    }

    warn(...args): void {
        console.warn(this.prefix('warning'), ...args);
    }

    error(...args): void {
        console.error(this.prefix('error'), ...args);
    }

}
